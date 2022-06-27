<template>
    <div>
        <h1 class="text-center">{{titolo}}</h1>
        <h2 class="text-center">{{sottotitolo}}</h2>
        <ul>
            <li v-for="article in articles" :key="article.id">
                {{article.title}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "AppMain",
    data() {
        return {
            posts: [],
            titolo: "Work in progress",
            sottotitolo: "lavori in corso",
        };
    },
    created() {
        axios.get('/api/articles').then((response)=>{
            console.log(response.data);
            this.articles = response.data;
        })
    }
}
</script>