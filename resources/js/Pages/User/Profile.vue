<template>

    <Nav />

    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">My profile</h2>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg container mx-auto my-12">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Your profile information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ info.name }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Blogs written</dt>
                        <dd class="mt-1 text-sm text-gray-900">-</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Email address</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ info.email }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Account created at</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ info.created_at }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="container mx-auto">
            <div class="text-center">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">My blogs</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    All the blogs you have published.
                </p>
            </div>

            <BlogOverview :posts="posts" :settings="settings" />
        </div>

    <Footer />

</template>

<script>
import Nav from "@/Shared/Layout/Nav";
import Footer from "@/Shared/Layout/Footer";
import BlogOverview from "@/Shared/BlogCards";

export default {
    components: {BlogOverview, Footer, Nav},

    props: {
        info: Object,
        posts: Array,
        settings: Boolean,
    }
}
</script>
