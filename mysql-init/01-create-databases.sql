-- nginx-proxy-manager için npm veritabanı oluştur
CREATE DATABASE IF NOT EXISTS `npm` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- npm veritabanına kullanıcı yetkisi ver
GRANT ALL PRIVILEGES ON `npm`.* TO 'ironman'@'%';

-- Değişiklikleri uygula
FLUSH PRIVILEGES;