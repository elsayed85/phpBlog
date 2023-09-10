-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2023 at 12:17 PM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
                         `id` bigint UNSIGNED NOT NULL,
                         `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                         `user_id` bigint UNSIGNED NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
                                                                                          (1, 'Aliquid quasi eum cupiditate sapiente libero itaque.', 'Voluptatibus nam dolore aut voluptas non. Occaecati quibusdam autem tenetur earum cupiditate voluptates molestias. Deleniti ipsa quia omnis qui.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (2, 'Incidunt non accusamus quia nam consequatur natus.', 'Eos quam velit enim distinctio. Voluptate magnam vel sint occaecati temporibus qui quia. Aut sint laboriosam animi sed illum qui aspernatur voluptas.', 9, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (3, 'Deserunt alias pariatur et enim sit veritatis maxime.', 'Dolorem consequatur omnis maxime. Eos officia consectetur ut itaque. Quos qui eius fugit deleniti et. Maxime error sit illo id quibusdam illo.', 3, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (4, 'Nesciunt et cumque et.', 'Nihil sit ea doloremque. Nulla dicta velit enim sed vel et. Voluptatibus dolore aut aut et ipsa. Quaerat nihil at quae ullam recusandae.', 4, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (5, 'Itaque quis nostrum aut quia in recusandae.', 'Et et libero amet quae ad. Quia aut et sit accusantium aliquid ipsa ut tempore. Qui velit asperiores omnis dolorem magni quis soluta ut.', 5, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (6, 'Et qui quaerat inventore qui ex.', 'Ut nisi repellat fuga saepe enim voluptas soluta. Praesentium corporis ad fugiat reiciendis voluptatem vitae. Sunt dolorem quo exercitationem beatae eos dolorem.', 7, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (7, 'Sed libero corporis dolorem est impedit soluta.', 'Assumenda amet unde aut dolorem nemo adipisci dolor. Quis in qui fugit ipsum tempore eos. Porro consequatur qui velit delectus voluptate. At earum et minus quia dolores maiores.', 3, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (8, 'Occaecati voluptatem dicta est esse maxime.', 'Repudiandae magnam aliquam qui dolorem minus quis libero sit. Rerum laboriosam dolor et sint in. Et laborum consequatur ut quidem officia eius amet. Rerum laudantium dolores deserunt officia incidunt commodi iusto est.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (9, 'Quis velit molestiae molestiae placeat iste.', 'Ab et placeat aspernatur iste aut dolorem. Esse enim necessitatibus aut repudiandae minus temporibus soluta. Soluta beatae quia qui consequatur velit enim beatae recusandae.', 7, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (10, 'Temporibus magnam quam provident error accusantium sint.', 'Maxime expedita dolores aut quas aspernatur soluta. Commodi totam sit repellendus voluptatem. Dolores laboriosam autem et laboriosam est cum at veritatis.', 5, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (11, 'Beatae esse aut tempore dolor similique est.', 'Aut tempore similique praesentium qui et vitae assumenda porro. Consequuntur rerum ullam aut consectetur et repellendus. Adipisci sed iure deserunt id quia ab in. Debitis rerum et ducimus deleniti quo voluptas.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (12, 'Velit nam suscipit vitae.', 'Nihil est quidem inventore consectetur maiores omnis neque. Exercitationem provident eaque ducimus. Quo consequuntur voluptatum ea adipisci. Quo maiores sint atque aut ad illo.', 9, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (13, 'Possimus beatae tempora accusantium molestiae explicabo soluta fuga.', 'Deserunt aut porro nam. Est accusantium asperiores aut. Dolor debitis et dicta tempora eligendi. Autem ea id qui non eligendi.', 6, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (14, 'Dolor cum eius dolorem hic sunt animi.', 'Voluptas magni corrupti sint quaerat tenetur. Sunt similique esse alias eaque sed tempore.', 6, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (15, 'Quos et id exercitationem fuga consequatur architecto quo ut.', 'Et saepe maxime alias mollitia alias. Incidunt qui aliquid ipsam magni aut et et molestiae. Eum ipsum dolorum voluptatem aut sint ut. Iste est sunt omnis aut explicabo et aliquam quo.', 6, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (16, 'Numquam velit est a laboriosam at.', 'Omnis corrupti eum quas sed rem perspiciatis. Sit laudantium exercitationem qui sint rerum et id. Mollitia delectus rerum esse assumenda tempore nemo neque est.', 6, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (17, 'Quasi ut accusantium corrupti in vel ipsa.', 'Adipisci placeat dicta aliquam enim repellat quia. Voluptatem sint voluptas nisi similique sed. Qui soluta molestiae doloremque tempore cupiditate maiores sequi.', 2, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (18, 'Inventore distinctio delectus ullam doloremque.', 'Sunt eum et in fugiat dolor. Laborum voluptatem ea quia velit cupiditate rerum dolorem. Enim eligendi perferendis eos corporis quaerat adipisci. Distinctio maiores iste magni adipisci sed reprehenderit debitis quam.', 2, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (19, 'Facilis blanditiis adipisci maxime possimus.', 'Et quia quae ut sequi itaque vel eos. Nam quis odit facilis repellendus. Ducimus tenetur nisi commodi aliquid aut minima quibusdam.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (20, 'Nesciunt officiis iusto rerum quod.', 'At praesentium nihil ea corrupti ratione vel dolorum consequatur. Quia ut rerum dolorem placeat est. Alias quam ipsa nobis quod.', 2, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (21, 'Debitis et quod provident non nemo sapiente.', 'Vel sunt dolore doloribus qui tempora facilis. Tempora dolorum reprehenderit quia aliquid excepturi nihil. Eum eos consequatur iure aut nobis aliquam.', 7, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (22, 'Incidunt sit consequatur sit recusandae hic qui.', 'Est ipsa id adipisci. Id beatae inventore et fuga odit est voluptatem. Ipsa neque aspernatur deserunt provident.', 9, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (23, 'Explicabo iusto officia atque illum a quia ut.', 'Quibusdam adipisci in dolores dolore repellat dolorum. Expedita consequuntur accusantium aliquam. Est nesciunt dicta officiis alias aspernatur iusto explicabo.', 1, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (24, 'Cum qui molestias nulla et ut.', 'Facilis aperiam omnis sed blanditiis quidem. Quod et facilis quis dolorum voluptatem commodi facere voluptatem. Vero fugit et dolores ea fugit.', 6, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (25, 'Velit doloribus corrupti repudiandae id.', 'Inventore pariatur inventore molestiae autem. Eos ducimus earum quae similique maxime impedit veritatis omnis. Maxime id fuga et qui quod. Facilis hic enim soluta.', 8, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (26, 'A consectetur similique praesentium et.', 'Nobis eos omnis dicta iste asperiores. Aperiam qui recusandae unde sapiente dolorem alias iste beatae. Impedit sint deserunt sapiente minima laudantium fugiat ad. Ipsam autem nobis laborum quisquam qui fuga quis.', 5, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (27, 'Cum sit sit sed ad quibusdam inventore molestiae ut.', 'Et consectetur officia magni et aliquam. Officiis eaque ex sapiente aut quo. Consequatur illo omnis harum alias harum. Dicta atque molestias modi doloribus.', 5, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (28, 'Explicabo totam ut blanditiis officia.', 'Fuga nisi labore quo. Eligendi itaque doloribus sint numquam ipsam dolor. Sed non esse omnis ut libero perferendis velit.', 3, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (29, 'Enim vel laudantium impedit aut praesentium voluptates.', 'Dolore repudiandae debitis et possimus consequatur similique facere. Magnam non expedita maiores assumenda. Ea id in eum laboriosam.', 5, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (30, 'Voluptates porro dolorum in voluptatem.', 'Non nemo dicta a et sunt cumque. Architecto et doloribus facere. Aut vel odio nobis maiores.', 4, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (31, 'Autem voluptas dignissimos excepturi est quasi dolores.', 'Accusantium qui in ratione necessitatibus quibusdam deleniti molestias. Soluta sunt delectus ut harum. Harum dolorem quo omnis laborum quia autem. Consequatur eius excepturi ut omnis. Sint laudantium molestias sed consectetur.', 9, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (32, 'Minima facilis est delectus exercitationem est non voluptas.', 'Qui accusantium illo adipisci sapiente. Autem ea pariatur ad modi in repellendus. Ad eius veritatis corporis molestiae nesciunt velit velit.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (33, 'Omnis labore expedita ad aut.', 'Dolor dolores rerum iure mollitia ut ut nemo. Omnis deleniti commodi voluptatem earum sed. Sed et rerum inventore ea nesciunt natus beatae.', 7, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (34, 'Velit sed dolores sed nam ut.', 'Vitae cupiditate magni in culpa delectus perferendis. Fugiat voluptate quisquam exercitationem rem. Molestiae dolor fugit tenetur quia. Rerum est odio nesciunt et modi eius qui porro.', 1, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (35, 'Corrupti numquam similique ut sint dicta eos ea.', 'Vel cumque vero ea aut a voluptatem hic asperiores. Accusantium quia ut in et quae. Consequatur commodi at corporis sed. Qui facere sint quia qui quae.', 9, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (36, 'Perferendis quas error reiciendis natus cumque reiciendis.', 'Odit et nobis voluptate ipsam. Eligendi cumque sit officia atque perferendis. Quia veniam eos a sint fugiat eius. Veniam sed beatae dolores molestias nihil rem. Id quas alias omnis soluta.', 3, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (37, 'Aut omnis et voluptates nemo sed quia.', 'Eius aut rerum recusandae ut quo. Repellendus ut quia eius id voluptas qui. Qui fuga sint eum voluptatibus libero autem quis.', 8, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (38, 'Voluptas aut est quidem sunt aut quaerat ducimus veniam.', 'Sed commodi rerum quidem dolorum qui consequatur. Natus doloremque beatae deserunt eos aut nihil harum. Nihil delectus qui consequuntur velit. Sunt officiis voluptate cupiditate similique. Maxime cum deleniti reprehenderit facere autem iure.', 1, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (39, 'Et eius cumque eos vitae officia minima nisi.', 'Rerum sit error possimus qui impedit. Enim a recusandae labore delectus perferendis amet exercitationem aut. Mollitia quae consequatur consequatur omnis ut reprehenderit qui voluptatem.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (40, 'Quod in voluptas ducimus odit in quis.', 'Est totam quos dignissimos temporibus vero possimus. Rem praesentium quasi ut illo et aut qui. Iusto voluptatum modi veritatis.', 4, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (41, 'Libero porro officia et cupiditate quasi quo.', 'Sequi aut architecto et illo alias. Nemo numquam tempora harum tenetur enim. Quibusdam consequuntur occaecati et unde.', 10, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (42, 'Quidem blanditiis saepe voluptatibus corporis libero architecto possimus.', 'Officia et modi vel reprehenderit qui. Quia et eius cum molestias totam modi tenetur. Est et nihil eveniet non ad culpa est odio. Est sequi saepe atque alias impedit.', 5, '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                          (43, 'Id sed dolore suscipit commodi nisi quo.', 'Optio aliquid id doloribus voluptatem a enim. Ut exercitationem minus officia velit eius voluptatibus. Non sint neque quaerat dolorem aut omnis. Molestiae sit ex et perferendis sit est vel.', 2, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (44, 'Qui voluptates qui quia cumque.', 'Quisquam officiis consequuntur voluptatem ipsam nostrum dolore id. Aut sit optio est reiciendis temporibus et est quibusdam. Debitis fugiat esse quos delectus hic. Provident minima ut quod laborum veniam qui est.', 5, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (45, 'Nulla ad molestias nihil reprehenderit qui itaque ratione rerum.', 'Officia sit placeat nostrum adipisci. Rerum distinctio omnis cumque explicabo et rem. Ab et unde explicabo et adipisci.', 10, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (46, 'Voluptatem vel beatae maxime voluptatem et et.', 'Ut quo alias et ut et quasi. Vel sit nulla nemo qui et. Excepturi et quis fugit quia.', 4, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (47, 'Non enim libero consequatur in unde consequatur.', 'Dignissimos suscipit sunt non iure enim quo accusantium. Nemo id dolorem assumenda ut. Et debitis eius ullam sed omnis enim.', 3, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (48, 'Ex ullam et incidunt blanditiis.', 'Qui sint quia culpa modi. Omnis eos ab consequatur minus dolores omnis natus.', 3, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (49, 'Tenetur omnis alias sunt error.', 'Dolore officia magni et. Laudantium accusamus doloribus nobis nesciunt nisi facere sit. Sed necessitatibus totam commodi voluptatem cupiditate. Iure voluptatem quibusdam natus ea dolor.', 9, '2023-09-10 06:16:50', '2023-09-10 06:16:50'),
                                                                                          (50, 'Ut qui quia voluptas qui ad.', 'Omnis dolor impedit consequatur rerum beatae. Est magni sit pariatur deleniti quo itaque. A ut porro omnis vel. Qui excepturi occaecati aut perferendis animi.', 10, '2023-09-10 06:16:50', '2023-09-10 06:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` bigint UNSIGNED NOT NULL,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
                                                                                        (1, 'Dr. Roosevelt Macejkovic', 'kailee70@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (2, 'Prof. Americo Greenfelder', 'samanta08@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (3, 'Miss Lorena Stroman', 'flo07@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (4, 'Dr. Lorenz Lubowitz DVM', 'cjohnston@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (5, 'Dr. Isom Jerde', 'runolfsdottir.crawford@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (6, 'Tianna Dare', 'lavon70@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (7, 'Vernice Champlin', 'andreane32@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (8, 'Stefanie Marks', 'ebert.jarred@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (9, 'Ocie Wiza', 'gmedhurst@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49'),
                                                                                        (10, 'Deborah Towne', 'weffertz@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-09-10 06:16:49', '2023-09-10 06:16:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
    ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
    ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;