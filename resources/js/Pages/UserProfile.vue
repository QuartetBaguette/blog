<template>

    <Nav />

    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">My profile</h2>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg container mx-auto my-12">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Your profile information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
            </div>
            <div v-for="info in userinfo" class="border-t border-gray-200 px-4 py-5 sm:px-6">
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
                    <div class="sm:col-span-2">
                        <label class="text-sm font-medium text-gray-500"> Photo </label>
                        <div class="mt-1 flex items-center">
                          <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                              <div v-if="info.imageURL = ': '">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                              </div>
                              <div v-else>
                                <svg class="h-full w-full text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                              </div>
                          </span>
                            <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
                        </div>
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
import Nav from "../Shared/Nav";
import Footer from "../Shared/Footer";
import BlogOverview from "../Shared/BlogOverview";

export default {
    components: {BlogOverview, Footer, Nav},

    props: {
        userinfo: Array,
        posts: Array,
        settings: Boolean,
    }
}
</script>
