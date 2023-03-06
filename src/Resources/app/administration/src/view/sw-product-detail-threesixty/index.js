import template from './sw-product-detail-threesixty.html.twig';

const { Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Shopware.Component.register('sw-product-detail-threesixty', {
    template,
    inject: ['repositoryFactory', 'zipImportService'],

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
            disableStartButton: false
        }
    },
    computed:{

    },
    methods:{
        async onStartUpload(){
            this.isLoading = true;
            this.disableStartButton = true;

            console.log('upload start...')

            await this.zipImportService.zipImport(this.importedFile)
                .catch((exception) => {
                    this.createNotificationError({
                        message: exception,
                        autoClose: false,
                    });
                });

            this.isLoading = false;
        }
    }
})