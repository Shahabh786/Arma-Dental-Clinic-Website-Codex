module.exports = {
  content: [
    "./*.php",
    "./includes/*.php",
    "./api/*.php",
    "./assets/js/*.js",
  ],
  theme: {
    extend: {
      colors: {
        arma: {
          900: "#473425",
          800: "#5c3621",
          700: "#7e7570",
          500: "#c0b2a5",
          400: "#c6ab8e",
          200: "#e2d5cc",
          100: "#e2e1df",
        },
      },
      boxShadow: {
        premium: "0 20px 40px -20px rgba(71, 52, 37, 0.45)",
      },
    },
  },
};
