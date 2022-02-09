<template>

    <Nav />

    <div>{{userinfo}}</div>

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

    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Your blogs</h2>

<!--    <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">-->
<!--        <div v-for="post in posts" :key="post.title" class="flex flex-col rounded-lg shadow-lg overflow-hidden">-->
<!--            <div class="flex-shrink-0">-->
<!--                <img class="h-48 w-full object-cover" :src="post.cover" alt="" />-->
<!--            </div>-->
<!--            <div class="flex-1 bg-white p-6 flex flex-col justify-between">-->
<!--                <div class="flex-1">-->
<!--                    <p class="text-sm font-medium text-indigo-600">-->
<!--                        <Link href="/blogs" class="hover:underline">-->
<!--                            Article-->
<!--                        </Link>-->
<!--                    </p>-->
<!--                    <Link href="/blogs" class="block mt-2">-->
<!--                        <p class="text-xl font-semibold text-gray-900">-->
<!--                            {{ post.title }}-->
<!--                        </p>-->
<!--                        <p class="mt-3 text-base text-gray-500">-->
<!--                            {{ post.summary }}-->
<!--                        </p>-->
<!--                    </Link>-->
<!--                </div>-->
<!--                <div class="mt-6 flex items-center">-->
<!--                    <div class="flex-shrink-0">-->
<!--                        <span class="sr-only">{{ post.author }}</span>-->
<!--&lt;!&ndash;                        <img class="h-10 w-10 rounded-full" :src="" alt="" />&ndash;&gt;-->
<!--                    </div>-->
<!--                    <div class="ml-3">-->
<!--                        <p class="text-sm font-medium text-gray-900">-->
<!--                            {{ post.author }}-->
<!--                        </p>-->
<!--                        <div class="flex space-x-1 text-sm text-gray-500">-->
<!--&lt;!&ndash;                            <time :datetime="post.creationDate">&ndash;&gt;-->
<!--&lt;!&ndash;                                {{ post.creationDate }}&ndash;&gt;-->
<!--&lt;!&ndash;                            </time>&ndash;&gt;-->
<!--                            <span aria-hidden="true">-->
<!--                                        &middot;-->
<!--                                    </span>-->
<!--                            <span> {{ post.readingTime }} read </span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

    <Footer />

</template>

<script>
import Nav from "../Shared/Nav";
import Footer from "../Shared/Footer";
export default {
    components: {Footer, Nav},
    props: {
        userinfo: Array,
        posts: Array,
    }
}
</script>
