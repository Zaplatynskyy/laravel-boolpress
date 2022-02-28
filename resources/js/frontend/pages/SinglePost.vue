<template>
    <section class="single_post container">
        <div class="post">
            <div class="info_post">
                <h2 class="title">{{post.title}}</h2>
                <div class="date_published">{{datePost(post.updated_at)}}</div>
            </div>

            <div class="tags" v-if="post.tags">
                <span v-for="tag in post.tags" :key="tag.id">#{{tag.name}}</span>
            </div>

            <div class="image">
                <img :src="`/storage/${post.image}`" :alt="post.title">
            </div>

            <div class="category" v-if="post.category">
                {{post.category.name}}
            </div>

            <div class="post_content">{{post.content}}</div>
        </div>

        <div class="ins_comment">
            <form @submit.prevent="sendComment()">
                <div class="data_form">
                    <label for="name">Inserisci il tuo nome</label>
                    <input type="text" id="name" v-model="formData.name">
                </div>

                <div class="data_form">
                    <label for="content">Inserisci il tuo commento</label>
                    <textarea  id="content" cols="30" rows="10" v-model="formData.content"></textarea>
                </div>
                <div class="errors" v-show="formErrors.content">
                    <div  v-for="(error, i) in formErrors.content" :key="i">{{error}}</div>
                </div>
                <div class="message errors" v-show="formErrors.post_id">
                    <div  v-for="(error, i) in formErrors.post_id" :key="i">{{error}}</div>
                </div>

                <button type="submit">Aggiungi commento</button>

                <div class="message success" v-show="successComment">Messaggio Inviato correttamente e in attesa di conferma</div>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SinglePost',

    data() {
        return {
            post : {},

            formData : {
                name : '',
                content : '',
                post_id : null
            },

            formErrors : {},

            successComment : false
        }
    },

    created() {
        axios.get(`http://localhost:8000/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
                this.formData.post_id = response.data.id;
            }).catch( ()=> {
                // handle error
                this.$router.push({name: "page-404"})
            })
    },

    methods : {
        datePost(date) {
            const newDate = new Date(date);
            return newDate.getDate() +'-'+ newDate.getMonth() +'-'+ newDate.getFullYear()
        },

        sendComment() {
            axios.post('http://localhost:8000/api/comments', this.formData)
                .then((response)=> {
                    this.formData.name = '';
                    this.formData.content = '';
                    this.successComment = true;

                }).catch( (error)=> {
                // handle error
                    this.formErrors = error.response.data.errors;
                })
        }
    }
}
</script>

<style lang="scss" scoped>

.post{
    background-color: #fff;
    border-radius: 20px;
    padding: 40px 80px;
    margin: 20px 0;

    .info_post {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .tags {
        margin-bottom: 10px;

        span {
            margin-right: 5px;
        }
    }

    .image {
        width: 90%;
        margin: auto;

        img {
            width: 100%;
            border-radius: 5px;
        }
    }

    .category {
        text-align: center;
        font-weight: bold;
        text-transform: uppercase;
        background-color: yellow;
        border-radius: 15px;
        padding: 10px 20px;
        margin: 10px 0;
    }

    .post_content {
        margin-top: 10px;
    }
}

.ins_comment {
    background-color: #fff;
    border-radius: 20px;
    padding: 40px 80px;
    margin: 20px 0;

    .data_form {
        display: flex;
        flex-direction: column;

        label {
            font-size: 1.1rem;
            font-weight: bold;
        }

        input, textarea {
            padding: 5px 10px;
            margin: 10px 0;
        }
    }

    .message {
        color: white;
        border-radius: 5px;
        padding: 5px;
        margin: 10px 0;
    }

    .errors {
        background-color: #e3342f;
    }

    .success {
        background-color: #38c172;
    }

    button {
        color: white;
        text-transform: uppercase;
        background-color: #38c172;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px 10px;
    }
}

</style>