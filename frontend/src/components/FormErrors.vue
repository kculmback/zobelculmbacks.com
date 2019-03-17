<template lang="pug">
  .form-errors(v-if="formErrors")
    p.form-errors__error(v-if="typeof formErrors === `string`") {{ formErrors }}
    .form-errors__list(v-else)
      ul(v-for="errors in formErrors")
        li(v-if="typeof errors === `string`") {{ errors }}
        li(v-else-if="typeof errors === `object`" v-for="error in errors") {{ error }}
</template>

<script>
export default {
  name: 'FormErrors',
  props: ['formErrors'],
}
</script>

<style lang="postcss" scoped>
.form-errors {
}
</style>
