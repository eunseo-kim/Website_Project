const saveBtn = document.querySelector(".saveBtn");
const resetBtn = document.querySelector(".resetBtn");
const check_ID = document.querySelector(".check_id");

saveBtn.addEventListener("click", () => check_input());
resetBtn.addEventListener("click", () => reset_form());
check_ID.addEventListener("click", () => check_id());

function check_id() {
  // 왜 php 폴더 안으로 안들어가지? (결국 member_check_if.php를 빼서 사용함)
  window.open("member_check_id.php?id=" + document.member_form.id.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=no");
  //   window.open("/php/member_check_id.php?id=" + document.member_form.id.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=no");
}

function check_input() {
  if (!document.member_form.pass.value) {
    alert("비밀번호를 입력하세요!");
    document.member_form.pass.focus();
    return;
  }

  if (!document.member_form.pass_confirm.value) {
    alert("비밀번호확인을 입력하세요!");
    document.member_form.pass_confirm.focus();
    return;
  }

  if (!document.member_form.name.value) {
    alert("이름을 입력하세요!");
    document.member_form.name.focus();
    return;
  }

  if (!document.member_form.email1.value) {
    alert("이메일 주소를 입력하세요!");
    document.member_form.email1.focus();
    return;
  }

  if (!document.member_form.email2.value) {
    alert("이메일 주소를 입력하세요!");
    document.member_form.email2.focus();
    return;
  }

  if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
    alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
    document.member_form.pass.focus();
    document.member_form.pass.select();
    return;
  }

  document.member_form.submit();
}

function reset_form() {
  document.member_form.id.value = "";
  document.member_form.pass.value = "";
  document.member_form.pass_confirm.value = "";
  document.member_form.name.value = "";
  document.member_form.email1.value = "";
  document.member_form.email2.value = "";

  document.member_form.id.focus();

  return;
}
