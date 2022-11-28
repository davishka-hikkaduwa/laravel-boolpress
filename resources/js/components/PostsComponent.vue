<template>
<div>
    <div v-if="loading">...LOADING...</div>

    <div v-else-if="errorMessage.length > 0">
        {{ errorMessage }}
    </div>

    <PostListComponent v-else-if="!detail" :posts="posts" @clickedPost="showPost" />

    <div v-else>
        <PostComponent :post="detail" />
        <button @click="showList">BACK</button>
    </div>
</div>
</template>

<script>
import PostComponent from './PostComponent.vue'
import PostListComponent from './PostListComponent.vue'

export default {
    name: 'PostsComponent',
    components: {
        PostComponent,
        PostListComponent
    },
    data(){
        return {
            posts: [],
            detail: undefined,
            errorMessage: '',
            loading: true,
        }
    },
    mounted(){
        console.log('PostComponent exists');

        axios.get('/api/posts').then(({data})=>{
            if(data.success){
                this.posts = data.results;
            }else{
                this.errorMessage = data.error;
            }
            this.loading = false;
        })
    },
    methods:{
        showPost(id){
            console.log(id);
            this.loading = true;
            axios.get('api/posts/' + id)
                .then(response=>{
                    console.log(response);
                    this.detail = response.data.success ? response.data.results : undefined;
                    this.loading = false;
                })
                .catch(e=>{
                    console.log('error', e);
                    this.loading = false;
                })
        },
        showList(){
            this.detail = undefined;
        }
    }
}
</script>

<style>

</style>
