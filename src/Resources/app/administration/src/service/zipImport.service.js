import ApiService from 'src/core/service/api.service';


export default class ZipImportService extends ApiService{

    constructor(httpClient, loginService, apiEndpoint = 'zip-import') {
        super(httpClient, loginService, apiEndpoint);

        this.name = 'zipImportService';
        this.httpClient = httpClient;
    }

    async zipImport(file){
        const formData = new FormData();

        if(file){
            console.log('append: '+file)
            formData.append('file', file)
        }

        await this.httpClient.post('/_action/zip-import/upload', formData, {
            headers: this.getBasicHeaders(),
        }).then((response) => {
            return ApiService.handleResponse(response)
        })
    }
}