-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 05:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`) VALUES
(1, 'banglore karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'vikram', 'vikram@gmail.com', '$2y$10$MPAeCHp1iJ6LdkkFd0nr7.7NRKdtsMYDSuJtK8rVIeMnzcZqoHI1G');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `category`, `title`, `content`, `img`, `created_at`) VALUES
(2, 'health', 'Yoga benefits beyond the mat ', 'Yoga, an ancient practice and meditation, has become increasingly popular in today\'s busy society. For many people, yoga provides a retreat from their chaotic and busy lives. This is true whether you\'re practicing downward facing dog posture on a mat in your bedroom, in an ashram in India, or even in New York\'s Times Square. Yoga provides many other mental and physical benefits. Some of these extend to the kitchen table.\r\nTypes of yoga\r\n\r\nThere are many types of yoga. Hatha (a combination of many styles) is one of the most popular styles. It is a more physical type of yoga rather than a still, meditative form. Hatha yoga focuses on pranayamas (breath-controlled exercises). These are followed by a series of asanas (yoga postures), which end with savasana (a resting period).\r\n\r\nThe goal during yoga practice is to challenge yourself physically, but not to feel overwhelmed. At this \"edge,\" the focus is on your breath while your mind is accepting and calm.\r\nA better body image\r\n\r\nYoga develops inner awareness. It focuses your attention on your body\'s abilities at the present moment. It helps develop breath and strength of mind and body. It\'s not about physical appearance.\r\n\r\nYoga studios typically don\'t have mirrors. This is so people can focus their awareness inward rather than how a pose — or the people around them — looks. Surveys have found that those who practiced yoga were more aware of their bodies than people who didn\'t practice yoga. They were also more satisfied with and less critical of their bodies. For these reasons, yoga has become an integral part in the treatment of eating disorders and programs that promote positive body image and self-esteem.\r\nBecoming a mindful eater\r\n\r\nMindfulness refers to focusing your attention on what you are experiencing in the present moment without judging yourself.\r\n\r\nPracticing yoga has been shown to increase mindfulness not just in class, but in other areas of a person\'s life.\r\n\r\nResearchers describe mindful eating as a nonjudgmental awareness of the physical and emotional sensations associated with eating. They developed a questionnaire to measure mindful eating using these behaviors:\r\n\r\n    eating even when full (disinhibition)\r\n    being aware of how food looks, tastes, and smells\r\n    eating in response to environmental cues, such as the sight or smell of food\r\n    eating when sad or stressed (emotional eating)\r\n    eating when distracted by other things.\r\n\r\nThe researchers found that people who practiced yoga were more mindful eaters, according to their scores. Both years of yoga practice and number of minutes of practice per week were associated with better mindful eating scores. Practicing yoga helps you be more aware how your body feels. This heightened awareness can carry over to mealtime as you savor each bite or sip and note how food smells, tastes, and feels in your mouth.\r\nA boost to weight loss and maintenance\r\n\r\nPeople who practice yoga and are mindful eaters are more in tune with their bodies. They may be more sensitive to hunger cues and feelings of fullness.\r\n\r\nResearchers found that people who practiced yoga for at least 30 minutes once a week for at least four years gained less weight during middle adulthood. People who were overweight actually lost weight. Overall, those who practiced yoga had lower body mass indexes (BMIs) compared with those who did not practice yoga. Researchers attributed this to mindfulness. Mindful eating can lead to a more positive relationship with food and eating.\r\nEnhancing fitness\r\n\r\nYoga is known for its ability to soothe tension and anxiety in the mind and body. But it can also have an impact on a person\'s exercise capacity.\r\n\r\nResearchers studied a small group of sedentary individuals who had not practiced yoga before. After eight weeks of practicing yoga at least twice a week for a total of 180 minutes, participants had greater muscle strength and endurance, flexibility, and cardio-respiratory fitness.\r\nCardiovascular benefits\r\n\r\nSeveral small studies have found yoga to have a positive effect on cardiovascular risk factors: it helped lower blood pressure in people who have hypertension. It\'s likely that the yoga restores \"baroreceptor sensitivity.\" This helps the body senses imbalances in blood pressure and maintain balance.\r\n\r\nAnother study found that practicing yoga improved lipid profiles in healthy patients, as well as in patients with known coronary artery disease. It also lowered excessive blood sugar levels in people with non-insulin dependent diabetes and reduced their need for medications. Yoga is now being included in many cardiac rehabilitation programs due to its cardiovascular and stress-relieving benefits.\r\n\r\nBefore you start a new exercise program, be sure to check with your doctor.\r\n\r\nResearchers are also studying if yoga can help people with depression and arthritis, and improve survival from cancer.', 'yoga.jpg', '2024-07-01'),
(3, 'fitness', 'How to Build Muscle Effectively: The Role of Protein, Diet, and Exercise', 'If you were to ask most people what it takes to build muscle, they’d probably say that you just need to eat protein, protein and more protein. Protein is important, to be sure. After all, your muscles are made of protein, and your body requires adequate protein in your diet in order to have the building blocks it needs to build up muscle mass. But protein alone won’t do. You need to pay attention to the rest of your diet and exercise routine as well.\r\n​Why It Takes More Than Just Protein to Build Muscle\r\n\r\n​A lot of people who are trying to bulk up are also trying to lose body fat at the same time. But, sometimes, the approaches they use to meet those goals are at odds with each other. They’ll take in plenty of protein, which, when coupled with a strength training routine, should lead to more lean mass. But they may also cut their total calories back too far in an effort to get “shredded.”\r\n\r\n​That can be a problem. If you cut your calories too much, some of the protein that you eat is going to be burned for fuel rather than being used to support muscle development. So to effectively build muscle mass, you want to ensure that you have enough calories to support your activity and the right balance of nutrients, too.\r\n​1. Fuel up with carbohydrates.\r\n\r\n​Many bodybuilders see carbs as the enemy, and that can be a mistake. Yes, highly refined carbohydrates and sweets hardly do the body good. But the right carbohydrates help to fuel activity, including working muscles.\r\n\r\n​Good sources of carbs can be found in:\r\n\r\n    Whole grains\r\n    Beans\r\n    Fruits\r\n    Vegetables\r\n\r\n​Without adequate carbohydrates to fuel your exercise, some of the protein you’re eating might get burned for fuel. So to avoid “burning the candle at both ends,” make sure to include enough high-quality carbs in your diet.\r\n​2. Get some healthy fats.\r\n\r\n​Dietary fat is sometimes underappreciated by some athletes. Like carbs, fats may have an undeserved bad reputation. Small amounts of the right kinds of fats are very important. That’s because certain fatty acids, the building blocks of dietary fats, are essential, and the body can’t make them. Fatty acids are a vital structural component of every cell membrane, including muscle cells. The body relies on fat to fuel moderate intensity, longer-term exercise. That’s just the type of exercise that might be coupled with a strength training regimen to build mass and lose body fat. \r\n\r\n​Good sources of fatty acids:\r\n\r\n    Nuts\r\n    Seeds\r\n    Fatty fish\r\n    Olive oil\r\n    Avocado', 'workout.webp\r\n', '2024-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(9, 1, 13, 1, '2024-06-27 10:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Yoga & Fitness', 'Products related to yoga and fitness activities.', '2024-06-27 05:22:14'),
(2, 'Strength Training', 'Equipment and accessories for strength training.', '2024-06-27 05:22:14'),
(3, 'Nutrition', 'Health and wellness supplements and nutrition products.', '2024-06-27 05:22:14'),
(4, 'Footwear', 'Shoes for various sports and fitness activities.', '2024-06-27 05:22:14'),
(5, 'Wearables', 'Fitness trackers and other wearable devices.', '2024-06-27 05:22:14'),
(6, 'Accessories', 'Various health and fitness accessories for different users\r\n', '2024-06-27 05:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'vikram', 'vikram01@gmail.com', 'nothing but testing the message', 'unseen'),
(2, '', 'vikram@gmail.com', '', 'unseen'),
(3, '', '', '', 'unseen'),
(4, '', '', '', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `address` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `address`, `payment_method`, `payment_status`, `status`, `created_at`) VALUES
(2, 1, 1200.00, 1, '', '', 'pending', '2024-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(2, 2, 15, 2, 150.00, '2024-06-28 08:20:25'),
(4, 2, 14, 2, 452.00, '2024-06-28 08:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount_price`, `category_id`, `image`, `image2`, `image3`, `stock`, `created_at`) VALUES
(12, 'Yoga Blocks', 'Pair of sturdy yoga blocks for support and balance.', 149.00, 119.00, 1, 'yoga_blocks.png', '', '', 4, '2024-06-27 05:22:31'),
(13, 'Dumbbell Set', 'Set of adjustable dumbbells for strength training.', 49.99, 39.99, 2, 'Dumbbell-Set.jpg', '', '', 6, '2024-06-27 05:22:31'),
(14, 'Resistance Bands', 'Set of resistance bands for full-body workouts.', 15.99, 12.99, 2, 'resistance_bands.jpg', '', '', 8, '2024-06-27 05:22:31'),
(15, 'Exercise Ball', 'Anti-burst exercise ball for core and stability workouts.', 19.99, 17.99, 2, 'exercize_ball.jpg', '', '', 3, '2024-06-27 05:22:31'),
(16, 'Foam Roller', 'High-density foam roller for muscle recovery and massage.', 14.99, 11.99, 2, 'foam_roller.jpg', '', '', 2, '2024-06-27 05:22:31'),
(18, 'Running Shoes', 'Lightweight running shoes with excellent cushioning.', 79.99, 69.99, 4, 'running_shoes.avif', '', '', 0, '2024-06-27 05:22:31'),
(19, 'Fitness Tracker', 'Wearable fitness tracker with heart rate monitor.', 59.99, 49.99, 5, 'fitness_tracker.jpg', '', '', 2, '2024-06-27 05:22:31'),
(20, 'Water Bottle', 'BPA-free water bottle with leak-proof cap.', 9.99, 7.99, 6, 'water_bottle.webp', '', '', 7, '2024-06-27 05:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address_1` int(11) DEFAULT NULL,
  `address_2` int(11) DEFAULT NULL,
  `address_3` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address_1`, `address_2`, `address_3`, `created_at`) VALUES
(1, 'vikram', 'vikram@gmail.com', '$2y$10$MPAeCHp1iJ6LdkkFd0nr7.7NRKdtsMYDSuJtK8rVIeMnzcZqoHI1G', '9449050563', 1, NULL, NULL, '2024-06-27 05:03:49'),
(2, 'test', 'test@gmail.com', 'test', '1234567892', NULL, NULL, NULL, '2024-07-01 17:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(8, 1, 13, '2024-06-28 09:25:37'),
(9, 1, 14, '2024-06-28 09:25:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_address` (`address`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `address_1` (`address_1`),
  ADD KEY `address_2` (`address_2`),
  ADD KEY `address_3` (`address_3`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_address` FOREIGN KEY (`address`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_1`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`address_2`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`address_3`) REFERENCES `address` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
