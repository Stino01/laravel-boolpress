<template>
    <section>
        <div class="card" v-if="article">
        <h1>{{article.title}}</h1>
        <p>{{article.content}}</p>
        <ul v-if="article.tags">
            <li v-for="tag in article.tags" :key="tag.id">{{tag.name}}</li>
        </ul>
        <!-- <img :src="`/storage/${article.image}`" alt=""> -->
        </div>
    </section>
</template>

<script>
export default {
    name: "SingleArticleComponent",
    data(){
        return {
            article : null,
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/articles/${slug}`).then((response)=>{
            this.article = response.data
        })
    }
}
</script>

<style lang="scss" scoped>

</style>