<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Subscription;
use Stripe\Exception\ApiErrorException;
use Stripe\Subscription as StripeSubscription;
use Stripe\SubscriptionItem as StripeSubscriptionItem;

class SyncStripeCommand extends Command
{
    protected $signature = 'sync:stripe';

    protected $description = 'Sync Stripe';

    /**
     * @throws ApiErrorException
     */
    public function handle(): void
    {
        $this->info('Syncing Stripe Subscriptions...');
        $this->syncSubscriptions();
    }

    /**
     * @throws ApiErrorException
     */
    private function syncSubscriptions(): void
    {
        $subscriptions = (Cashier::stripe()->subscriptions->all()->data);

        foreach ($subscriptions as $subscription) {
            $this->info('Syncing Subscription: ' . $subscription->id);
            $this->createOrUpdateSubscription($subscription);
        }
    }
    private function createOrUpdateSubscription(StripeSubscription $subscription): void
    {
        $this->info('Syncing Subscription: ' . $subscription->id);
        $user = User::where('stripe_id', $subscription->customer)->firstOrFail();
        $data = [
            'name' => $subscription->plan->nickname ?? $subscription->plan->id,
            'user_id' => $user->id,
            'stripe_id' => $subscription->id,
            'stripe_status' => $subscription->status,
            'stripe_price' => $subscription->plan->id,
            'quantity' => $subscription->quantity,
            'trial_ends_at' => $subscription->trial_end,
            'ends_at' => $subscription->current_period_end,
            'created_at' => $subscription->created,
        ];
        $subscription = Subscription::updateOrCreate(['stripe_id' => $subscription->id], $data);
        foreach ($subscription->items as $item) {
            $this->info('Syncing Subscription Item: ' . $item->id);
            $this->createOrUpdateSubscriptionItem($item, $subscription);
        }
        $this->info('Subscription Synced: ' . $subscription->id);
    }
    private function createOrUpdateSubscriptionItem(StripeSubscriptionItem $item, Subscription $subscription): void
    {
        $this->info('Syncing Subscription Item: ' . $item->id);
        $data = [
            'stripe_id' => $item->id,
            'stripe_product' => $item->plan->product,
            'stripe_price' => $item->plan->id,
            'quantity' => $item->quantity,
            'created_at' => $item->created,
        ];
        $subscription->items()->updateOrCreate(['stripe_id' => $item->id], $data);
        $this->info('Subscription Item Synced: ' . $item->id);
    }
}
