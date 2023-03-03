const url = "multiple.php";
const imagens = document.getElementById("get-files");
const submit = document.getElementById("submit");

submit.addEventListener("click", (e) => {
  console.log(typeof imagens.files);
  const files = imagens.files;
  const formData = new FormData();

  for (let i = 0; i < files.length; i++) {
    let file = files[i];

    formData.append("files[]", file);
  }

  fetch(url, {
    mode: "no-cors",
    method: "POST",
    body: formData,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      console.log(data);
    });
});
