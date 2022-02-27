<template>
    <section id="page_not_found">
        <div class="container">
            <div class="image">
                <img src="img/page-not-found.jpg" alt="page not found 404">
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name : 'PageNotFound'
}
</script>

<style lang="scss" scoped>
.image {
    width: 500px;
    border-radius: 15px;
    overflow: hidden;
    margin: auto;

    img {
        width: 100%;
    }
}
</style>