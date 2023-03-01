import Plugin from 'src/plugin-system/plugin.class';
import DomAccess from 'src/helper/dom-access.helper';
import DeviceDetection from 'src/helper/device-detection.helper';
import * as bootstrap from 'bootstrap';
//import {JavascriptViewer} from "@3dweb/360javascriptviewer";


export default class ThreesixtyViewerPlugin extends Plugin{

    static options = {
        modalSelector: '#threeSixty-viewer-modal',
        btnSelector: '.product-detail-media button'
    }

    init(){
        const modal = DomAccess.querySelector(document, this.options.modalSelector);
        this._registerEventListeners(modal);



    }

    _registerEventListeners(modal){

        const btn =  DomAccess.querySelector(document, this.options.btnSelector);
        const event = (DeviceDetection.isTouchDevice()) ? 'touchstart' : 'click';
        btn.addEventListener(event, this._openModal.bind(this, modal));

        const doc = document.documentElement;
        console.log(doc)
        doc.on('shown.bs.modal', this._onOpenModal.bind(this))

    }
    _openModal(){
        const modalElement = this.el;

        const bsModal = new bootstrap.Modal(this.el, {
            keyboard: false
        });

        /*const listener = () => {
            this._onOpenModal();

            this.$emitter.publish('modalShow', { modalElement });
        };
        bsModal._element.removeEventListener('shown.bs.modal', listener);
        bsModal._element.addEventListener('shown.bs.modal', listener);*/

        bsModal.show();


    }

    _onOpenModal(){
        console.log('opened')
    }
}

