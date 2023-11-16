<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $products = json_decode(<<<JSON
 [
    {
        "id": 1,
        "title": "Egg Paratha",
        "quantity": 10,
        "price": 200,
        "description": "Indulge in the perfect fusion of flavors with our delightful Egg Paratha! This scrumptious breakfast option features a light and flaky paratha generously stuffed with a filling of spiced scrambled eggs. ",
        "category": "paratha",
        "image": "https://tse3.mm.bing.net/th?id=OIP.KBZWCPF-xQj1xcW0nmYcgAHaEK&pid=Api&P=0&h=220",
        "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 2,
        "title": "Masala Paratha Bliss ",
        "quantity": 20,
        "price": 250,
        "description": "Embark on a flavor-packed journey with our enticing Masala Paratha! This breakfast delight features a perfectly cooked paratha infused with a medley of aromatic spices that awaken your taste buds. Stuffed with a tantalizing mixture of seasoned potatoes, onions, and herbs, each bite promises a symphony of savory goodness.",
        "category": "paratha",
        "image": "https://i.pinimg.com/736x/70/0f/50/700f50ed54c81d7b3cf29931ef42adc4.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 3,
        "title": "Classic Club Sandwich Elegance",
        "quantity": 15,
        "price": 550,
        "description": "Elevate your breakfast experience with our Classic Club Sandwich, a timeless creation that combines layers of culinary perfection. Stacked high between slices of toasted artisan bread, you'll discover premium layers of succulent grilled chicken, crispy bacon, fresh lettuce, juicy tomatoes, and velvety mayonnaise.",
        "category": "sandwich",
        "image": "https://i.pinimg.com/564x/fb/d7/a5/fbd7a5652fca495ce1c40ddd017402a3.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 4,
        "title": "Savory Cheese Melt Delight",
        "quantity": 5,
        "price": 760,
        "description": "Start your morning with a burst of flavor with our Savory Cheese Melt Sandwich. This breakfast delight features a symphony of melted cheeses sandwiched between slices of perfectly toasted bread, creating a gooey and indulgent experience. Our carefully selected blend of cheeses, from creamy mozzarella to sharp cheddar, ensures each bite is a rich and satisfying encounter for your taste buds. ",
        "category": "sandwich",
        "image": "https://i.pinimg.com/564x/47/2b/d1/472bd1fa377b429f12c60dd7766c1b66.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 5,
        "title": "Zen Green Tea Elixir",
        "quantity": 14,
        "price": 495,
        "description": "Awaken your senses and embrace tranquility with our Zen Green Tea. Sourced from the finest tea gardens, our green tea leaves are carefully selected to deliver a refreshing and invigorating experience. Immerse yourself in the delicate aroma as the leaves unfurl, releasing their natural essence. With a light and grassy flavor profile, this antioxidant-rich elixir is not just a beverage; it's a journey to wellness. ",
        "category": "tea",
        "image": "https://i.pinimg.com/564x/3a/b0/fe/3ab0fed12137a6fbb16a67227a4b6ff8.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 6,
        "title": "Coffe ",
        "quantity": 16,
        "price": 168,
        "description": "Indulge in the rich aroma and bold flavor of our Artisanal Morning Brew. Sourced from the finest Arabica beans, our carefully crafted coffee is a symphony of robust notes and velvety smoothness. Roasted to perfection, each sip is a journey through layers of complexity, from the initial bright acidity to the lingering chocolate undertones. Whether you prefer it black or adorned with a touch of frothy goodness",
        "category": "tea",
        "image": "https://tse2.mm.bing.net/th?id=OIP.7INwCDNvue7AcpeZVAxG-gHaIo&pid=Api&P=0&h=220",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 7,
        "title": "Luscious Strawberry Symphony Shake",
        "quantity": 24,
        "price": 700,
        "description": "Embark on a blissful journey with our Luscious Strawberry Symphony Shake, a harmonious blend of succulent strawberries and creamy indulgence. Crafted with the freshest handpicked strawberries, each sip is a burst of fruity sweetness that dances on your palate. Blended to perfection with velvety smooth ice cream or yogurt, this shake is a celebration of freshness and flavor",
        "category": "shake",
        "image": "https://i.pinimg.com/564x/c2/6c/a7/c26ca7a397c013b099b5cb3a9ac62f4a.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 8,
        "title": "Velvety Banana Bliss Shake",
        "quantity": 30,
        "price": 650,
        "description": "Indulge in the smooth and velvety goodness of our Banana Bliss Shake. Crafted with ripe, golden bananas, this refreshing shake is a celebration of natural sweetness and creamy delight. Each sip unveils the luscious flavor of bananas blended to perfection with rich ice cream or yogurt, creating a symphony of textures and tastes. Served chilled in a tall glass, our Banana Bliss Shake is not just a beverage; it's a morning treat that brings joy to your senses.",
        "category": "shake",
        "image": "https://i.pinimg.com/564x/74/20/b2/7420b2d72f1efecf0e76c34c89d44028.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 9,
        "title": "Nectar of the Oasis - Dates Shake ",
        "quantity": 35,
        "price": 900,
        "description": "Transport yourself to an oasis of flavor with our Dates Shake, a tantalizing blend that marries the natural sweetness of premium dates with indulgent creaminess. Handpicked for perfection, the dates infuse every sip with a rich, caramel-like essence, creating a drink that's both wholesome and decadent. Blended to a velvety smooth consistency, this shake is a celebration of the finest ingredients.",
        "category": "shake",
        "image": "https://i.pinimg.com/736x/96/8e/7c/968e7ca60b5334620ba9ab7453eb888b.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 10,
        "title": "Tropical Sunrise Mango Shake",
        "quantity": 40,
        "price": 870,
        "description": "Embark on a taste journey with our Tropical Sunrise Mango Shake, where the luscious sweetness of ripe mangoes meets the cool embrace of creamy indulgence. Sourced from the sun-kissed orchards, our mango shake is a celebration of vibrant flavors and velvety texture. Every sip delivers the essence of succulent mangoes, blended to perfection with silky smooth ice cream or yogurt.",
        "category": "shake",
        "image": "https://i.pinimg.com/564x/28/9b/7e/289b7ed7f2910d22245fe14165a6bb6c.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 11,
        "title": "Naan Elegance with Spiced Paye Delight",
        "quantity": 45,
        "price": 1590,
        "description": "Experience breakfast opulence with our Naan with Spiced Paye, a symphony of flavors that marries the delicate texture of freshly baked naan with the rich essence of spiced trotters. Picture soft, pillowy naan, warm from the oven, paired with a generous serving of paye slow-cooked to perfection. Immerse yourself in the aromatic blend of spices as you savor the tenderness of the trotters.",
        "category": "paratha",
        "image": "https://i.pinimg.com/564x/af/17/ba/af17baba52818434992950a8f01ad372.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 12,
        "title": "Signature Sunrise Chai",
        "quantity": 50,
        "price": 230,
        "description": "Awaken your senses with our Signature Sunrise Chai, a fragrant blend that transcends the ordinary. Crafted from the finest tea leaves and a secret blend of aromatic spices, our chai is a symphony of warmth and flavor. The rich amber hue invites you to savor the robust notes of cardamom, cinnamon, and cloves, harmoniously dancing with the depth of black tea. Served in traditional earthen cups or modern mugs, our chai is a morning ritual that embraces tradition while delivering a contemporary twist.",
        "category": "tea",
        "image": "https://i.pinimg.com/564x/d8/8a/a7/d88aa78547772f056740505199f37f0a.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 13,
        "title": "Savory Aloo Paratha Bliss",
        "quantity": 55,
        "price": 599,
        "description": "Dive into a morning of comfort with our Savory Aloo Paratha Bliss. Immerse yourself in the tantalizing aroma of freshly cooked parathas, generously stuffed with a spiced mashed potato filling. The golden, flaky exterior gives way to a warm and flavorful center that encapsulates the essence of home-cooked goodness. Served with a dollop of creamy yogurt or zesty pickles, each bite is a delightful journey through the rich flavors of potatoes, blended with aromatic spices",
        "category": "paratha",
        "image": "https://i.pinimg.com/564x/22/a5/eb/22a5eb601a3dfeaf1e868432d004cb59.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 14,
        "title": "Chai Paratha Harmony",
        "quantity": 60,
        "price": 999,
        "description": "Discover the perfect harmony of flavors with our Chai Paratha experience. Start your day with a steaming cup of our Signature Sunrise Chai, a fragrant blend of premium tea leaves and aromatic spices. Paired with it is our classic Aloo Paratha, a golden delight stuffed with spiced mashed potatoes, cooked to perfection. The robust notes of chai complement the savory richness of the paratha, creating a symphony of taste that's both comforting and invigorating. Served with a side of cooling yogurt or tangy pickles, our Chai Paratha ",
        "category": "paratha",
        "image": "https://i.pinimg.com/564x/da/92/f7/da92f7db11a49809480eaa9dc623d08a.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 15,
        "title": "Decadent Chocolate Temptation Shake",
        "quantity": 65,
        "price": 670,
        "description": "Indulge your sweet tooth with our Decadent Chocolate Temptation Shake, a symphony of rich cocoa and velvety smoothness. Crafted from the finest chocolate, each sip is a luscious journey through layers of deep, chocolatey goodness. Our premium cocoa is blended to perfection with creamy ice cream or yogurt, creating a shake that's not just a beverage but a dessert in a glass. Served with a crown of whipped cream or a sprinkle of chocolate shavings, this shake is a celebration of indulgence. ",
        "category": "shake",
        "image": "https://i.pinimg.com/564x/df/f7/fb/dff7fb444c5439c7fa59f83bcba03cef.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 16,
        "title": "Velvet Chocolate Bliss Pastry",
        "quantity": 70,
        "price": 795,
        "description": "Indulge in the ultimate breakfast treat with our Velvety Chocolate Dream Pastry. This exquisite creation features layers of light, flaky pastry embracing a rich and decadent chocolate filling. The heavenly combination of premium chocolate and our signature cream creates a symphony of textures and flavors that will transport your taste buds to a world of pure bliss. Topped with a delicate swirl of whipped cream and a sprinkle of chocolate shavings, this pastry is a true celebration of morning indulgence. ",
        "category": "cake",
        "image": "https://i.pinimg.com/564x/96/67/36/966736b0f455d221d9f3b71f14167b7e.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },

    {
        "id": 17,
        "title": "  Velvety Chocolate Dream Pastry",
        "quantity": 72,
        "price": 980,
        "description": "Elevate your breakfast experience with our Velvet Chocolate Bliss Pastry, a divine creation that harmonizes the richness of premium chocolate with the lightness of whipped cream. Encased in delicate layers of flaky pastry, each bite unveils a symphony of textures and flavors. The indulgent chocolate filling is complemented by a generous swirl of freshly whipped cream, creating a luxurious combination that dances on your palate. Served with a dusting of cocoa or a drizzle of chocolate ganache, our Velvet Chocolate Bliss Pastry is not just a sweet treat; it's a morning celebration of decadence and delight.",
        "category": "cake",
        "image": "https://i.pinimg.com/564x/a2/7d/94/a27d94edb97b66caa9cda04f7428d715.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 18,
        "title": "Divine Brownie Indulgence with Shake ",
        "quantity": 75,
        "price": 1360,
        "description": "Satisfy your morning sweet cravings with our Divine Brownie Indulgence paired with a refreshing shake. Immerse yourself in the decadence of a freshly baked brownie, its rich, fudgy interior perfectly complemented by a crackling, indulgent exterior. Paired alongside is our signature shake, a velvety blend of flavors that adds a delightful twist to your breakfast experience. Whether you're a chocolate connoisseur or just seeking a sweet morning escape, this pairing is a celebration of textures and tastes. Served with a dollop of whipped cream or a scoop of vanilla ice cream, our Brownie with Shake is the perfect way to start your day on a sweet note.",
        "category": "shake",
        "image": "https://i.pinimg.com/564x/d5/fb/1e/d5fb1e05799d8f178209c936ad088112.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 19,
        "title": "Sunny Morning Delight: Fried Egg with Paratha",
        "quantity": 23,
        "price": 1450,
        "description": "Awaken your senses with our Sunny Morning Delight, a classic breakfast that marries the simplicity of a perfectly fried egg with the flaky goodness of a golden paratha. Picture the sun-kissed yolk, delicately cooked to a golden hue, nestled on a bed of warm, buttery paratha. The crispiness of the paratha complements the velvety richness of the fried egg, creating a symphony of textures and flavors that dance on your palate. Served with a side of tangy pickles or a dash of hot sauce, this dish is a celebration of morning comfort that's as delightful as a sunrise.",
        "category": "paratha",
        "image": "https://i.pinimg.com/564x/93/a0/24/93a0243355a01dc0d51f4b25001ca33a.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    },
    {
        "id": 20,
        "title": "Naan Kulcha ",
        "quantity": 27,
        "price": 760,
        "description": "Embark on a culinary journey with our Naan Kulcha Extravaganza, a delightful breakfast that fuses the softness of naan and the fluffiness of kulcha in a symphony of flavors. Our naan, freshly baked to perfection, is paired with a selection of kulchas featuring a medley of fillings like potato, paneer, or mixed vegetables. Each bite is a delightful adventure, with the soft naan providing the perfect canvas for the flavorful stuffing. Served with a side of aromatic chutneys or cooling raita, this breakfast experience is a celebration of the diverse and delectable tastes of Indian cuisine. ",
        "category": "paratha",
        "image": "https://i.pinimg.com/564x/3b/56/8b/3b568b60e9a9f8afede67e3392ddf282.jpg",
         "ratings_rate": 4.6,
        "ratings_count": 400
    }
]
JSON
, true);

        foreach ($products as $product) {
            Product::create($product);
        }
     /*   $this->call([
            StorySeeder::class,
        ]);*/
    }
}
