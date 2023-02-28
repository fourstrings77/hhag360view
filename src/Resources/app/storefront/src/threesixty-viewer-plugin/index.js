import Plugin from 'src/plugin-system/plugin.class';
import PseudoModalUtil from 'src/utility/modal-extension/pseudo-modal.util';

export default class ThreesixtyViewerPlugin extends Plugin{

    static options ={

    }

    init(){
        console.log('init viewer', this.options)
        this.addEventListeners()
    }

    addEventListeners(){

    }
}

