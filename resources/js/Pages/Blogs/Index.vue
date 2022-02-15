<template>
  <div v-for="blog in blogs">
      <BlogCard :blog="blog" />
  </div>
</template>

<script>
import BlogCard from './BlogCard.vue'
export default {
    components: {
        BlogCard
    }

}
</script>

<style>

</style>
