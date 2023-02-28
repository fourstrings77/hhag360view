import ThreesixtyViewerPlugin from "./threesixty-viewer-plugin";

const PluginManager = window.PluginManager;

PluginManager.register('ThreesixtyViewerPlugin', ThreesixtyViewerPlugin, "[data-three-sixty-viewer-plugin]");

if(module.hot){
    module.hot.accept();
}