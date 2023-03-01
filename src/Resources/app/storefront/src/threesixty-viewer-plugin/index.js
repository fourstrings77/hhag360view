import Plugin from 'src/plugin-system/plugin.class';
import DomAccess from 'src/helper/dom-access.helper';
import DeviceDetection from 'src/helper/device-detection.helper';
import * as bootstrap from 'bootstrap';
import { JavascriptViewer } from "@threesixty/360javascriptviewer";


export default class ThreesixtyViewerPlugin extends Plugin{
    _viewer;
    static options = {
        modalSelector: '#threeSixty-viewer-modal',
        btnSelector: '.product-detail-media button',
        viewerContainerSelector: 'jsv-holder',
        viewerImageSelector: 'jsv-image',

    }

    init(){
        this._registerEventListeners();
    }

    _registerEventListeners(){

        const btn =  DomAccess.querySelector(document, this.options.btnSelector);
        const event = (DeviceDetection.isTouchDevice()) ? 'touchstart' : 'click';
        btn.addEventListener(event, this._openModal.bind(this));

        $(document).on('shown.bs.modal', this._onOpenModal.bind(this)); //warumauchimmer...
        $(document).on('hidden.bs.modal', this._onHideModal.bind(this));

    }
    _openModal(){

        const bsModal = new bootstrap.Modal(this.el, {
            keyboard: false
        });

        bsModal.show();
    }

    _onOpenModal(){
        this._viewer = new JavascriptViewer({
            mainHolderId: this.options.viewerContainerSelector,
            mainImageId: this.options.viewerImageSelector,
            imageUrls: this.options.images,
            speed: 70,
            defaultPogressBar: true,
        });
        this._viewer.start();
    }

    _onHideModal(){
        this._viewer.destroy();
    }
}

