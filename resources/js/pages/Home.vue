<template>
    <section id="posts_list">
        <div class="container">

            <div class="post">
                <div class="info_post">
                    <h2 class="title">Titolo</h2>
                    <div class="date_published">data post</div>
                </div>

                <img src="img/external-content.duckduckgo.com.jpg" alt="">

                <div class="post_content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id optio ut commodi voluptatum nemo! Et accusantium architecto laboriosam, minima dicta voluptas ipsa quia voluptatibus voluptates cupiditate facilis praesentium fugiat fugit.
                </div>
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',

    data() {
        return {
            posts : [] 
        }
    },

    created() {
        axios.get('http://localhost:8000/api/posts')

        axios.get('http://localhost:8000/api/posts')
            .then( response => {
                this.posts = response.data;
            })
    }
}
</script>

<style lang="scss" scoped>

#posts_list {

    .post{
        // padding: 20px 0;
        text-align: center;
        background-color: #fff;
        border-radius: 20px;
        padding: 40px 80px;
        margin: 20px 0;

        .info_post {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        img {
            border-radius: 5px;
            margin: 20px 0;
        }
    }
}
</style>