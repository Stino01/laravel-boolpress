<template>
    <section class="card">
        <h1>Articles</h1>
        <ul v-if="articles.length > 0">
            <li v-for="(article,index) in articles" :key="article.id">
                {{index}} - {{article.title}}
                <router-link :to="{ name: 'single-article', params: { slug: article.slug } }"> Visualizza Article </router-link>
            </li>
        </ul>
    </section>
</template>

<script>
export default {
    neme: "ArticlesComponent",
    data() {
        return {
            articles: [],
        }
    },
    created(){
        axios.get('/api/articles').then((response)=>{
            this.articles = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>

</style>