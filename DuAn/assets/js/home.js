function Render(Arrive,id){
  window.location.replace(`index.php?controller=${Arrive}&id=${id}`)
}


function RenderNotId(Arrive){
  window.location.replace(`index.php?controller=${Arrive}`)
}
