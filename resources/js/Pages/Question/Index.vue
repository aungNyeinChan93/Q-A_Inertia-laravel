<template>

    <Head title="Questions" />
    <div>
        <div class="grid grid-cols-12 gap-4 mx-2 mt-4">
            <div class="col-span-10 col-start-2 bg-gray-100 p-1">
                <div class="grid grid-cols-12">
                    <div class="col-span-5 p-2">
                        <div class="card bg-gray-300/50 p-2 mt-2 rounded">
                            <div class="card-header bg-gray-300 p-1 rounded-t-xl  ">
                                All Tag
                            </div>
                            <div class="card-body bg-gray-100 p-1 ">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisici
                                    ng elit. Perferendis sapiente neque
                                    possimus totam voluptatibus quo fugit, con
                                    sequuntur veniam. Quibusdam, odit?</p>
                            </div>
                            <div class="card-footer bg-gray-300 rounded-b-xl ">
                                dsafsd
                            </div>
                        </div>
                    </div>
                    <div class="col-span-7 p-2">
                        <Card v-for="question in questions.data" :key="question" :question="question" />
                        <div class="paginator flex justify-center items-center my-2">
                            <Link
                            :class="{'bg-red-400':link.active ,'text-white/30': !link.url}"
                            class="px-2 py-1 bg-green-400 rounded-xl mx-1" v-for="link of questions.links"
                                :key="link.label" :href="link.url" v-html="link.label" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import Card from '../components/Card.vue';

defineProps({
    questions: {
        type: Array,
        required: true
    }
})

</script>

<style lang="scss" scoped></style>
