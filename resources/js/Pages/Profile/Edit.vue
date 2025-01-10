<template>

    <Head title="Profile-Edit" />
    <div class="w-full h-screen bg-gray-50 ">
        <div class="grid grid-cols-12 mx-10 py-2">
            <div class="col-span-6 col-start-4 ">
                <div class="card p-4 rounded-md bg-gray-400 mt-4 shadow-xl">
                    <form @submit.prevent="profileUpdate">
                        <div class="mb-6 flex justify-center items-center">
                            <img :src="preview ? preview : `storage/${user.image}`" alt="" class=" block w-[100px]">
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="default_size">Profile Image</label>
                            <input @input="change"
                                class="p-2 block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                                 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="default_size" type="file">
                        </div>

                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
                            <input type="text" id="default-input" v-model="form.name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Email</label>
                            <input type="text" id="default-input" v-model="form.email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800
                                focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                                 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, usePage, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const user = computed(() => {
    return page.props.auth.user
})

const preview = ref();




const form = useForm({
    name: user.value.name,
    email: user.value.email,
    image: user.value.image ? user.value.image : null,
})

const change = (e) => {
    form.image = e.target.files[0];
    preview.value = URL.createObjectURL(e.target.files[0]);
    console.log(form.image);

}

const profileUpdate = () => {
    form.post('profile', {
        onError: () => form.reset(['name', 'email']),
    },)
}

</script>

<style lang="scss" scoped></style>
