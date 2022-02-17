<template>
    <Nav />

    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8 z-0">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3" />
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    Collection of all blogs
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    An overview of all the community written blogs. Create your own blog
                    <Link href="/createblog" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline"> here. </Link>
                </p>
            </div>
            <BlogOverview :posts="posts" />
        </div>
    </div>

    <Footer />
</template>

<script>
import Footer from "../../Shared/Layout/Footer";
import Nav from "../../Shared/Layout/Nav";
import { Link } from '@inertiajs/inertia-vue3';
import BlogOverview from "../../Shared/BlogCards";

export default {
    components: {BlogOverview, Nav, Footer, Link},
    props: { posts: Array },
}
</script>
