window.onload = function() {
    mainTitleList = ["Pomagając, dajesz radość. Czyń dobro!","Wolontariat to wybór, najlepszy wybór.", "Najlepsze rzeczy w życiu są darmowe, tak jak wolontariusze :)", "Pomaganie innym oznacza pomaganie sobie.", "Dawanie powinno być pasją.", "Życie zmienia się, gdy marzenie się spełni.", "Bądź osobą, którą chcesz, aby inni byli.", "Pomaganie innym jest tak satysfakcjonujące.", "Wszyscy kochamy wolontariuszy."];
    document.getElementById('main-title').innerHTML = mainTitleList[Math.floor(Math.random() * mainTitleList.length)];
}