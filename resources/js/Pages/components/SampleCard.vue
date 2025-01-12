<template>
    <div class="card p-1 mt-1">
        <div class="card-header bg-gray-300 py-1 px-3 rounded-t-xl ">
            <!-- {{ comment.user.name }} -->
            <p v-for="item in comments" :key="item.id">
              <span class="ps-1 text-red-600 text-sm " v-if="item.id == comment.id">{{ item.user.name }}</span>
            </p>
        </div>
        <div class="card-body bg-gray-100 py-2  px-4">
            <p>{{ comment.comment }}</p>
        </div>
        <div class="card-footer bg-gray-300 rounded-b-xl px-4 py-2">
            <slot name="footer" />
        </div>
    </div>

</template>

<script setup>

defineProps({
    comment: {
        type: Object,
        required: true
    },
    comments: {
        type: Array
    }
})



</script>

<style lang="scss" scoped></style>
