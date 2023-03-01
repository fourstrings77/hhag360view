import ThreesixtyViewerPlugin from "./threesixty-viewer-plugin";

const PluginManager = window.PluginManager;

PluginManager.register('ThreesixtyViewerPlugin', ThreesixtyViewerPlugin, "[data-threesixty-viewer-plugin]");

if(module.hot){
    module.hot.accept();
}