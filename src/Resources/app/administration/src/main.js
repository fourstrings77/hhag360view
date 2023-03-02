import './page/sw-product-detail';
import './view/sw-product-detail-threesixty';


Shopware.Module.register('sw-new-tab-threesixty', {
    routeMiddleware(next, current){
        if(current.name === 'sw.product.detail'){
            current.children.push({
                name: 'sw.product.detail.threesixty',
                path: '/sw/product/detail/:id/threesixty',
                component: 'sw-product-detail-threesixty',
                meta:{
                    parentPath: 'sw.product.index'
                }
            });
        }
        next(current);
    }
});