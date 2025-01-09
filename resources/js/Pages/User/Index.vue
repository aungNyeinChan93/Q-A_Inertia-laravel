<template>
    <Head title="Users" />
    <div class="mx-10 flex">
        <p class="py-2 bg-green-400 rounded-sm w-[200px] text-xl text-center">User List</p>
    </div>
    <div class="overflow-x-auto mx-10 mt-4">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm border">
            <thead class="ltr:text-left rtl:text-right bg-green-300 ">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Avator</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Created</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Updated</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr v-for="user in users.data" :key="user.id">
                    <td class="whitespace-nowrap ps-5 py-2 font-medium text-gray-900">
                        <img :src="user.image" class="w-[70px] rounded-xl p-1" alt="">
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ user.name }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ user.email }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ new
                        Date(user.created_at).toLocaleDateString('en-GB') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ new
                        Date(user.updated_at).toLocaleDateString('en-GB') }}</td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <Link href="#"
                            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                        View
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="paginater mx-10 py-4 px-2 flex justify-between items-center">
        <div>
            <Link :class="{'bg-red-400': link.active ,'text-gray-200/50 bg-green-300/80':!link.url }" class="px-2 py-1 rounded-xl bg-green-400 ms-2" v-for="link in users.links" :key="link.label"
                :href="link.url" v-html="link.label" />
        </div>
        <p class="text-green-500/90 text-sm t">Showing from {{ users.from }} to {{ users.to }} of {{ users.total }}</p>
    </div>
</template>


<script setup>
defineProps({
    users: {
        type: Object,
        required: true,
    }
})

</script>

<style lang="scss" scoped></style>
