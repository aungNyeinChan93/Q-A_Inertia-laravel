<template>
    <div class="card p-1 mt-1">
        <div class="card-header bg-gray-300 py-1 px-3 rounded-t-xl ">
            <!-- {{ comment.user.name }} -->
              {{ comment }}
        </div>
        <div class="card-body bg-gray-100 py-2  px-4">
            <p>{{ comment.comment }}</p>
        </div>
        <div class="card-footer bg-gray-300 rounded-b-xl px-4 py-2">
            <slot name="footer"/>
        </div>
    </div>

</template>

<script setup>
defineProps({
    comment:{
        type:Object,
        required:true
    }
})

</script>

<style lang="scss" scoped></style>
