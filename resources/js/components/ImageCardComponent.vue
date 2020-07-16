<template>
  <div class="image-container" :id="`image-card-${imageData.objectID}`">
      <img :src="imageData.primaryImageSmall" class="image-view"/>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      imageData: Object,
      dataUrl:'https://collectionapi.metmuseum.org/public/collection/v1/objects/',
    };
  },
  props: {
    objectid:null,
  },
  watch:{

  },
  created(){
      this.getImageData();
  },
  computed:{
    
  },
  methods: {
    getImageData(){
      let url = this.dataUrl + this.objectid
        axios.get(url)
        .then(response => {
            this.imageData = response.data

        })
    },
    }
  }

</script>

<style lang="scss" scoped>
    .image{
        &-container{

        }
        &-view{
            width: 17.8vw;
            height: 300px;
            object-fit: cover;
        }
    }


</style>