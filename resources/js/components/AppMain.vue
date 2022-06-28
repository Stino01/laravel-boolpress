<template>
    <div>
        <h1 class="text-center">Home</h1>
        <div class="container d-flex flex-wrap">
            <div class="card col-4 p-3" v-for="(article, index) in articles" :key="index">
                <p>{{article.title}}</p>
                <p>{{article.content}}</p>
                <a href="#" @click="getDetail(article.slug, index)">Vedi dettaglio</a>
                <span v-if="article.detail">
                    {{article.detail.slug}}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "AppMain",
    data() {
        return {
            articles: [],
        };
    },
    methods: {
        getDetail(slug, index){
            axios.get('/api/articles/'+ slug).then((response)=>{
                console.log(response.data);
                this.articles[index].detail = response.data;
                console.log(this.post[index]);
            })
        }
    },
    created() {
        axios.get('/api/articles').then((response)=>{
            this.articles = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>

</style>