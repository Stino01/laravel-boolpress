<template>
    <div>
        <h1 class="text-center">{{titolo}}</h1>
        <h2 class="text-center">{{sottotitolo}}</h2>
    </div>
</template>

<script>
export default {
    name: "AppMain",
    data() {
        return {
            titolo: "Work in progress",
            sottotitolo: "lavori in corso",
        };
    }
}
</script>