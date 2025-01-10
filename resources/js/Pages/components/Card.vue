<template>
    <div class="card my-2 bg-white rounded-xl">
        <a href="#" class="relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8">
            <span
                class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

            <div class="sm:flex sm:justify-between sm:gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                        {{ question.title }}
                    </h3>

                    <p class="mt-1 text-xs font-medium text-gray-600">{{ question.user.name }}</p>


                    <div class="category p-1 my-1">
                        <span class="px-3 py-1 rounded-full bg-green-300 hover:bg-green-400 me-2 text-xs">test</span>
                        <span class="px-3 py-1 rounded-full bg-green-300 hover:bg-green-400 me-2 text-xs">test</span>
                    </div>
                </div>


                <div class="hidden sm:block sm:shrink-0">
                    <img alt=""
                        :src="question.user.image ? `storage/${question.user.image}` : `https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80`"
                        class="size-16 rounded-lg object-cover shadow-sm" />
                </div>
            </div>

            <div class="mt-4">
                <p class="text-pretty text-sm text-gray-500">
                    {{ question.body }}
                </p>
            </div>

            <hr class="mt-6 text-red-900">

            <div class="mt-2 reaction ">
                <div class="grid grid-cols-12 p-2">
                    <div class="col-span-6 flex space-x-5">
                        <div>
                            <i class="pi pi-user text-blue-400"></i>
                            <small> 4 </small>
                        </div>
                        <div>
                            <i class="pi pi-heart text-red-400"></i>
                            <small> 4 </small>
                        </div>
                        <div>
                            <i class="pi pi-star text-green-400"></i>
                            <small> 4 </small>
                        </div>
                    </div>
                    <div class="col-span-6 flex justify-end space-x-5">
                        <div class="flex flex-col-reverse">
                            <dt class="text-sm font-medium text-gray-600">Published</dt>
                            <dd class="text-xs text-gray-500">{{ new
                                Date(question.created_at).toLocaleDateString('en-GB') }}
                            </dd>
                        </div>

                        <div class="flex flex-col-reverse">
                            <dt class="text-sm font-medium text-gray-600">Update Time</dt>
                            <dd class="text-xs text-gray-500">{{ timeAgo(question.updated_at) }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

<script setup>
import { computed } from 'vue';

defineProps({
    question: {
        type: Object,
    }
});

const timeAgo = (date) => {
    const now = new Date();
    const updated = new Date(date);
    const diff = Math.floor((now - updated) / (1000 * 60)); // difference in minutes
    if (diff < 1) return 'just now';
    if (diff < 60) return `${diff} minutes ago`;
    if (diff < 1440) return `${Math.floor(diff / 60)} hours ago`;
    return `${Math.floor(diff / 1440)} days ago`;
};

</script>

<style lang="scss" scoped></style>
