import ImageCard from './components/ImageCardComponent.vue';
import Pagination from "vue-bootstrap-pagination";

const app = new Vue({
    el: '#gallery',
    data: {
        searchUrl:'https://collectionapi.metmuseum.org/public/collection/v1/search',
        search:null,
        imageID: [],
        pagination: {
            current_page: 1,
            per_page: 12,
            last_page: 0
        },
        paginationOptions: {
            offset: 3,
            previousText: "Prev",
            nextText: "Next",
            alwaysShowPrevNext: true
        },
    },
    created(){
       
    },
    computed: {
        getCurrentImages() {
            let lastItem = this.pagination.current_page * this.pagination.per_page,
                offset = lastItem - this.pagination.per_page;

            return this.imageID.slice(offset, lastItem);
        },
    },
    methods: {
        searchImage(){
            this.imageID = []
                    
            this.getImageID()

        },
        getImageID(){
            let params = {
                hasImages: true,
                q: this.search,
            }

            this.pagination.current_page = 1
            this.pagination.per_page = 12
            this.pagination.last_page = 0
            this.isContent = true;
            this.checkAll = false;

            console.log(this.searchUrl,params)

            axios.get(this.searchUrl, {params})
            .then(response => {

                if(response.data.objectIDs){
                    this.$nextTick(function() {
                        this.$set(this.$data, 'imageID', response.data.objectIDs)
                    })
    
                    let value = response.data.total / 12
                    this.pagination.last_page = Math.ceil(value)

                }else{

                }
            })
        },
        callback(){
            
        },
    },
    components:{
        ImageCard,
        Pagination
    },
    mounted() {
        
    }
});
