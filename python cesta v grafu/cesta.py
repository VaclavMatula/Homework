import sys

def najdi_nejkratsi_cestu(grafova_matice, pocatecni_uzel, koncovy_uzel):
    uzly = set(grafova_matice.keys())
    nejkratsi_vzdalenost = {uzel: sys.maxsize for uzel in uzly}
    predchudci = {}
    navstivene_uzly = set()
    nejkratsi_vzdalenost[pocatecni_uzel] = 0

    while navstivene_uzly != uzly:
        neprojité_uzly = {uzel: nejkratsi_vzdalenost[uzel] for uzel in uzly if uzel not in navstivene_uzly}
        aktualni_uzel = min(neprojité_uzly, key=neprojité_uzly.get)

        for soused in grafova_matice[aktualni_uzel]:
            if grafova_matice[aktualni_uzel][soused] > 0:
                vzdalenost_do_souseda = nejkratsi_vzdalenost[aktualni_uzel] + grafova_matice[aktualni_uzel][soused]
                if vzdalenost_do_souseda < nejkratsi_vzdalenost[soused]:
                    nejkratsi_vzdalenost[soused] = vzdalenost_do_souseda
                    predchudci[soused] = aktualni_uzel

        navstivene_uzly.add(aktualni_uzel)

    if nejkratsi_vzdalenost[koncovy_uzel] == sys.maxsize:
        return None, sys.maxsize  # Neexistuje cesta

    cesta = []
    aktualni_uzel = koncovy_uzel
    while aktualni_uzel != pocatecni_uzel:
        cesta.insert(0, aktualni_uzel)
        aktualni_uzel = predchudci[aktualni_uzel]
    cesta.insert(0, pocatecni_uzel)

    return cesta, nejkratsi_vzdalenost[koncovy_uzel]

# Vstupní data
uzly = ['A', 'B', 'C', 'D', 'E','F']
grafova_matice = {
    'A': {'A': 0, 'B': 0, 'C': 1, 'D': 0, 'E': 0, 'F': 0},
    'B': {'A': 0, 'B': 0, 'C': 2, 'D': 4, 'E': 0, 'F': 0},
    'C': {'A': 1, 'B': 2, 'C': 0, 'D': 0, 'E': 0, 'F': 0},
    'D': {'A': 0, 'B': 4, 'C': 0, 'D': 0, 'E': 0, 'F': 0},
    'E': {'A': 0, 'B': 0, 'C': 0, 'D': 0, 'E': 0, 'F': 2},
    'F': {'A': 0, 'B': 0, 'C': 0, 'D': 0, 'E': 2, 'F': 0}
}

pocatecni_uzel = 'E'
koncovy_uzel = 'D'

cesta, vzdalenost = najdi_nejkratsi_cestu(grafova_matice, pocatecni_uzel, koncovy_uzel)

if vzdalenost == sys.maxsize:
    print(f'Neexistuje cesta z uzlu {pocatecni_uzel} do uzlu {koncovy_uzel}.')
else:
    print(f'Nejkratší cesta z uzlu {pocatecni_uzel} do uzlu {koncovy_uzel}:')
    print('Cesta:', ' -> '.join(cesta))
    print('Celková délka cesty:', vzdalenost)
