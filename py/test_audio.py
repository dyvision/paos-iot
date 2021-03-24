import pulsectl

pulse = pulsectl.Pulse('paos')

print(pulse.source_list())