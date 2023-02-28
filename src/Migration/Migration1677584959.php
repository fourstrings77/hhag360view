<?php declare(strict_types=1);

namespace Hhag\ThreesixtyViewer\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1677584959 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1677584959;
    }

    public function update(Connection $connection): void
    {
$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS `hhag_media_threesixty_data` (
    `id` BINARY(16) NOT NULL,
    `media_id` BINARY(16) NULL,
    `image_index` INT(11) NOT NULL,
    `image_axis` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($sql);

    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
