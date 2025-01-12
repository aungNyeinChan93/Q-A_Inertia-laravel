<template>
    <div class="question-detail mx-10">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 col-start-3">
                <Card :question="question" />
                <div class="comment">
                    <h3 class="text-2xl text-green-500 p-2 underline ">Comments</h3>
                    <SampleCard v-for="comment in question.comments" :key="comment.id" :comment="comment" :comments="comments" />
                </div>
                <div class="mt-3 p-2">
                    <Link class="px-5 py-2 rounded bg-blue-500 hover:bg-blue-400" :href="route('questions.index')">Back
                    </Link>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import Card from '../components/Card.vue';
import SampleCard from '../components/SampleCard.vue';

defineProps({
    question: {
        type: Object,
        required: true
    },
    comments:{
        type:Array,

    }
})


</script>

<style lang="scss" scoped></style>
