<template>
  <div class="app-wrapper">
    <navbar />
    <app-main />
  </div>
</template>

<script>
import { Navbar, AppMain } from './components';

export default {
  name: 'PagePOS',
  components: {
    AppMain,
    Navbar,
  },
};
</script>

<style lang="scss" scoped>
@import '~@/styles/mixin.scss';
@import '~@/styles/variables.scss';

.app-wrapper {
  @include clearfix;
  position: relative;
  height: 100%;
  width: 100%;
  background-color: rgb(240, 242, 245);
}
</style>
