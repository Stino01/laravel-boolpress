<template>
    <div>
        <h1 class="text-center">Home</h1>
        <ul>
            <li v-for="article in articles" :key="article.id">
                {{article.title}}
            </li>
        </ul>
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
    created() {
        axios.get('/api/articles').then((response)=>{
            //console.log(response);
            this.articles = response.data
        })
    }
}
</script>