<?php declare(strict_types=1);

namespace Hhag\ThreesixtyViewer;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

class HhagThreesixtyViewer extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext); // TODO: Change the autogenerated stub
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext); // TODO: Change the autogenerated stub
    }

    public function update(UpdateContext $updateContext): void
    {
        parent::update($updateContext); // TODO: Change the autogenerated stub
    }

    public function activate(ActivateContext $activateContext): void
    {
        parent::activate($activateContext); // TODO: Change the autogenerated stub
    }

    public function deactivate(DeactivateContext $deactivateContext): void
    {
        parent::deactivate($deactivateContext); // TODO: Change the autogenerated stub
    }

}