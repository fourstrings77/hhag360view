<?php declare(strict_types=1);

namespace Hhag\ThreesixtyViewer\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1678171873 extends MigrationStep
{
    const MEDIA_FOLDER_ID="8ed9780026724d7b9e9d44c4269dc6be";
    const PRODUCT_MEDIA_FOLDER_CONFIG="7968C6AF036A487FA13D5830077484AF";

    public function getCreationTimestamp(): int
    {
        return 1678171873;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
        INSERT INTO `media_folder`(`id`, `default_folder_id`, `name`, `media_folder_configuration_id`)
        VALUES(self::MEDIA_FOLDER_ID, XXXX, '360 Viewer', self::PRODUCT_MEDIA_FOLDER_CONFIG)

SQL;

    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
