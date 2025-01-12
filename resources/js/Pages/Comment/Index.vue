<template>
    <div>
        create comment-id ={{ questionId }} | {{ $page.props.auth.user }}
        form
    </div>
</template>

<script setup>
defineProps({
    questionId:{
        type:String
    }
});
</script>

<style lang="scss" scoped>

</style>
