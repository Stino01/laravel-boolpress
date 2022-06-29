<template>
    <header>
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div v-for="(item, index) in menuItem" :key="index">
                    <router-link :to="{ name: item.routeName} " class="navbar-brand">{{item.label}}</router-link>
                </div>
                <!-- <li class="reserved"><a href="/admin">Area riservata</a></li> -->
            </ul>
            </div>
        </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "AppHeader",
    data(){
        return {
        menuItem: [
        {
            label: 'Home',
            routeName: 'home'
        },
        {
            label: 'Articles',
            routeName: 'articles'
        },
        {
            label: 'Chi Siamo',
            routeName: 'about'
        },
        {
            label: 'Contatti',
            routeName: 'contact',
        }
        ],
        }
    },
}
</script>

<style lang="scss" scoped>
nav {
    background-color: #b1b1b1;

    a {
        color: black;
    }
}
</style>