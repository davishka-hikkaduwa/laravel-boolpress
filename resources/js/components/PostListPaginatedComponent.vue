<template>
<div>
    <div v-if="posts.length > 0">
        <div v-for="post in posts" :key="post.id">
            <span @click="showPost(post.id)"> {{ post.title }} </span>
        </div>
        <div class="my-2">
            Total Records: {{ totalRecords }}
        </div>

        <div class="my-2">
            <button :class="{ disable: currentPage === 1  }" @click="go(paginatedPosts.first_page_url)"> First </button>
            <button :class="{ disable: !paginatedPosts.prev_page_url }" @click="go(paginatedPosts.prev_page_url)"> Back </button>
                {{ currentPage }} / {{ totalPages }}
            <button :class="{ disable: !paginatedPosts.next_page_url }" @click="go(paginatedPosts.next_page_url)"> Forward </button>
            <button :class="{ disable: currentPage === totalPages }" @click="go(paginatedPosts.last_page_url)"> Last </button>
        </div>
    </div>
    <div v-else>
        No posts found.
    </div>
</div>
</template>

<script>
export default {
    name: 'PostListPaginatedComponent',

    computed: {
        posts(){
            return this.paginatedPosts.data;
        },
        currentPage(){
            return this.paginatedPosts.current_page;
        },
        totalPages(){
            return this.paginatedPosts.last_page;
        },
        totalRecords(){
            return this.paginatedPosts.total;
        }
    },
    props: {
        paginatedPosts: Object
    },
    methods: {
        showPost(id) {
            this.$emit('clickedPost', id);
        },
        go(url){
            this.$emit('requestPage', url)
        }
    }
}
</script>

<style lang="scss" scoped>
    button.disable{
        opacity: 0.5;
        pointer-events: none;
    }
</style>

