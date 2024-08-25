<template>
  <div>
    <h1>WebRTC Video Call</h1>
    <video ref="remoteVideo" autoplay></video>
  </div>
</template>

<script>
import Peer from 'simple-peer';

export default {
  data() {
    return {
      peer: null,
    };
  },
  methods: {
    startWebRTC() {
      // Code to initiate WebRTC
      const peer = new Peer({ initiator: location.hash === '#init', trickle: false });

      peer.on('signal', data => {
        // Send signaling data to server
      });

      peer.on('stream', stream => {
        this.$refs.remoteVideo.srcObject = stream;
      });

      this.peer = peer;
    }
  },
  mounted() {
    this.startWebRTC();
  }
};
</script>
