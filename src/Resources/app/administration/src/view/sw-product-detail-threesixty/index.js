import template from './sw-product-detail-threesixty.html.twig';

const { Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Shopware.Component.register('sw-product-detail-threesixty', {
    template,
    inject: ['repositoryFactory'],
    mixins:[
        Mixin.getByName('notification')
    ],
    metaInfo(){
        return {
            title: "360° View"
        }
    },

    data(){
        return {
            importedFile: null,
            isLoading: true,
        }
    },
    computed:{

    },
    methods:{

    }
})